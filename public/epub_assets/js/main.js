var templates = {};
var filenames = [
    'nav.xhtml', 'package.opf',
    'page.xhtml', 'page2.xhtml',
    'cover.xhtml', 'toc.ncx'
];

// page templates
var pageTemplateHtml = '';

document.addEventListener('DOMContentLoaded',
    function() {
        pageTemplateHtml =
            document.getElementById("epub-page-template").innerHTML.replace(/(\r\n|\n|\r|\s)/gm,"");
    });

(function() {
    filenames.forEach(function (filename, i) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', BASE_URL + '/epub_assets/epub_resouce/' + filename);
        xhr.onloadend = function (e) {
            templates[filename] = xhr.responseText;
        };
        xhr.send();
    });
})();

function exportToEpub() {
    var navView, packageView, bodyView, coverImage, language,
        author, direction, tree, toc, title, date, ext,
        modified = '',
        items = [],
        tocItems = [],
        itemrefs = [],
        files = [];

    title = $('#title-input').val();
    if (title === '') {
        alert('title is required.');
        return;
    }
    author = $('#author-input').val();
    language = 'en';
    direction = 'ltr';
    try {
        coverImage = $('#cover-input').get(0).files[0];
        ext = coverImage.type.split('/')[1];
    } catch (e) {
        coverImage = null;
    }

    // var htmlContent = '';

    // if( window.wwEditor ) {
    //     htmlContent = window.wwEditor.root.innerHTML.replace(/&nbsp?;/g, '&#160;');
    // }

    // tree = markdown.toHTML5Tree(editor.getValue(), 'GFM', { theme: 'ace-tm' });
    // markdown.setIndices(tree);

    navView = {
        title: title,
        // toc: markdown.getNavigation(tree, 'page.xhtml').innerHTML
        toc: 'Page'
    };

    date = new Date();
    modified += date.getUTCFullYear();
    modified += '-' + (date.getUTCMonth() < 10 ? '0' : '') + date.getUTCMonth();
    modified += '-' + (date.getUTCDate() < 10 ? '0' : '') + date.getUTCDate();
    modified += 'T' + (date.getUTCHours() < 10 ? '0' : '') + date.getUTCHours();
    modified += ':' + (date.getUTCMinutes() < 10 ? '0' : '') + date.getUTCMinutes();
    modified += ':' + (date.getUTCSeconds() < 10 ? '0' : '') + date.getUTCSeconds() + 'Z';

    if (coverImage) {
        items.push({
            id: 'cover.xhtml',
            href: 'cover.xhtml',
            'media-type': 'application/xhtml+xml'
        });
        items.push({
            id: 'cover.' + ext,
            href: 'cover.' + ext,
            'media-type': coverImage.type,
            properties: 'cover-image'
        });
        itemrefs.push({ idref: 'cover.xhtml' });
    }

    items.push(
        {
            id: 'style.css',
            href: 'style.css',
            'media-type': 'text/css'
        },
        {
            id: 'nav.xhtml',
            href: 'nav.xhtml',
            'media-type': 'application/xhtml+xml',
            properties: 'nav'
        });

    // add pages
    const pages = $(".pages")
        .children()
        .each(function() {
            const number = parseInt(
                $(this).find(".count").first().text()
            );

            const body = (new Quill(
                $(this).find(".ww-editor").first().get(0)
            )).root.innerHTML.replace(/&nbsp?;/g, '&#160;');

            const title = $(this)
                .find(".page-title")
                .first()
                .val().trim();

            const bodyView = { title:title, body:body };

            if( number ) {
                const page_name = 'page'+number+'.xhtml';

                // <item id="ncx" href="toc.ncx" media-type="application/x-dtbncx+xml"/>

                items.push({
                    id: page_name, href: page_name,
                    'media-type': 'application/xhtml+xml'
                });

                tocItems.push({
                    id: page_name,
                    href: page_name,
                    itemTitle: title
                });

                // spine
                itemrefs.push({
                    idref: page_name
                });

                // file content
                files.push({
                    name: page_name,
                    str: Mustache.render(pageTemplateHtml, bodyView)
                });
            }
        });

    items.push({
        id: "ncx",
        href: "toc.ncx",
        "media-type": "application/x-dtbncx+xml"
    });

    packageView = {
        title: title,
        uuid: uuid.v4(),
        lang: language,
        author: author,
        modified: modified,
        items: items,
        itemrefs: itemrefs,
        'page-progression-direction': direction
    };

    toc = {
        title: title,
        firstHref: 'page1.xhtml',
        items: tocItems
    };

    // bodyView = {
    //     title: title,
    //     body: htmlContent
    // };

    // htmlContent = Mustache.render(templates['page.xhtml'], bodyView);

    // application/epub+zip
    files.push(
        { name: 'mimetype', str: 'application/epub+zip', level: 0 },
        {
            name: 'META-INF', dir: [
                { name: 'container.xml', url: BASE_URL + '/epub_assets/epub_resouce/container.xml', level: 0 }
            ]
        },
        { name: 'style.css', url: BASE_URL + '/epub_assets/epub_resouce/style.css' },
        { name: 'nav.xhtml', str: Mustache.render(templates['nav.xhtml'], navView) },
        { name: 'package.opf', str: Mustache.render(templates['package.opf'], packageView) },
        { name: 'toc.ncx', str: Mustache.render(templates['toc.ncx'], toc) },
        // { name: 'page.xhtml', str: htmlContent },
        // { name: 'page2.xhtml', str: htmlContent },
    );

    if (coverImage) {
        var fileReader = new FileReader();
        var coverView = {
            ext: ext,
            title: title
        };

        fileReader.onloadend = function (e) {
            files.push({ name: 'cover.' + ext, buffer: fileReader.result });
            files.push({ name: 'cover.xhtml', str: Mustache.render(templates['cover.xhtml'], coverView) });
            exec();
        };
        fileReader.readAsArrayBuffer(coverImage);
    } else {
        exec();
    }

    function exec() {

        $("#meta").css({opacity:0.5,"pointer-events":"none"});

        jz.zip.pack({
            files: files,
            complete: function (packed) {
                var blob = new Blob([packed]);
                var url = (window.URL || window.webkitURL).createObjectURL(blob);
                var a = document.createElement('a');
                a.download = title + '.epub';
                a.href = url;

                // save file at the server
                var formData = new FormData();
                formData.append('epub_file', blob);

                $.ajax({
                    url: BLOB_SERVER_URL,
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN':CSRF_TOKEN
                    },
                    success: function(response) {
                        $("#meta").css({opacity:1,"pointer-events":"auto"});
                        $("#createEpub").modal("hide");

                        if( response && response !== '' ) {
                            $("#created_epub").val(response);

                            return alert("File Saved");
                        }

                        return alert("File Not Saved");
                    }
                });

                // var e = document.createEvent("MouseEvent");
                // e.initEvent("click", true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
                // a.dispatchEvent(e);
            }
        });
    }
}