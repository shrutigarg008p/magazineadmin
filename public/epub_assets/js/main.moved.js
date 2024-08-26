var templates = {};
var filenames = [
    'nav.xhtml', 'package.opf',
    'page.xhtml', 'page2.xhtml',
    'cover.xhtml'
];

var pageTemplateHtml = document.getElementById("epub-page-template").innerHTML;

(function() {
    filenames.forEach(function (filename, i) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'epub_resouce/' + filename);
        xhr.onloadend = function (e) {
            templates[filename] = xhr.responseText;
        };
        xhr.send();
    });
})();

function exportToEpub() {
    var navView, packageView, bodyView, coverImage, language,
        author, direction, tree, title, date, ext,
        modified = '',
        items = [],
        itemrefs = [];

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

    var htmlContent = '';

    if( window.wwEditor ) {
        htmlContent = window.wwEditor.root.innerHTML.replace(/&nbsp?;/g, '&#160;');
    }

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
        },
        {
            id: 'page.xhtml',
            href: 'page.xhtml',
            'media-type': 'application/xhtml+xml'
        },
        {
            id: 'page2.xhtml',
            href: 'page2.xhtml',
            'media-type': 'application/xhtml+xml'
        });

    // spines
    itemrefs.push(
        {
            idref: 'page.xhtml'
        },
        {
            idref: 'page2.xhtml'
        }
    );

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

    // var elem = document.createElement('p');
    // elem.innerHTML = markdown.renderJsonML(tree);
    // var codes = elem.querySelectorAll('pre[class^=lang]');
    // [].forEach.call(codes, function (v) {
    //     var code = v.querySelector('code');
    //     var lang = v.getAttribute('class').match(/lang-([a-zA-Z+]*)/)[1] || 'javascript';
    //     if (lang === 'c' || lang === 'cpp') lang = 'c_cpp';
    //     var node = ace.highlight(code.innerHTML, 'ace/mode/' + lang, 'ace-tm');
    //     v.innerHTML = node.innerHTML;
    // });

    bodyView = {
        title: title,
        // body: elem.innerHTML.replace(/&nbsp?;/g, '&#160;')
        // body: "<div><img src=\"https://picsum.photos/200\"/><h1 style=\"color:red\">Red Color Text</h1></div>"
        body: htmlContent
    };

    htmlContent = Mustache.render(templates['page.xhtml'], bodyView);

    // application/epub+zip
    var files = [
        { name: 'mimetype', str: 'application/epub+zip', level: 0 },
        {
            name: 'META-INF', dir: [
                { name: 'container.xml', url: 'epub_resouce/container.xml', level: 0 }
            ]
        },
        { name: 'style.css', url: 'epub_resouce/style.css' },
        { name: 'nav.xhtml', str: Mustache.render(templates['nav.xhtml'], navView) },
        { name: 'package.opf', str: Mustache.render(templates['package.opf'], packageView) },
        { name: 'page.xhtml', str: htmlContent },
        { name: 'page2.xhtml', str: htmlContent },
    ];

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
        jz.zip.pack({
            files: files,
            complete: function (packed) {
                var blob = new Blob([packed]);
                var url = (window.URL || window.webkitURL).createObjectURL(blob);
                var a = document.createElement('a');
                a.download = title + '.epub';
                a.href = url;

                var e = document.createEvent("MouseEvent");
                e.initEvent("click", true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
                a.dispatchEvent(e);
            }
        });
    }
}