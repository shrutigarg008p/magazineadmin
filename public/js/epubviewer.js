$(document).ready(function(){
	epubviewer();
})

function epubviewer(){
	// Load the opf
	var epub_path=$('#epub_path').val();
	// alert(epub_path);
    var book = ePub(epub_path,{ openAs: "epub" });
    var rendition = book.renderTo("viewer", { flow: "scrolled-doc", width: "700", height: "600" });
    var hash = window.location.hash.slice(2);
    // console.log(hash);
    rendition.display(hash || undefined);


    var next = document.getElementById("next");
    next.addEventListener("click", function(e){
      rendition.next();
      e.preventDefault();
    }, false);

    var prev = document.getElementById("prev");
    prev.addEventListener("click", function(e){
      rendition.prev();
      e.preventDefault();
    }, false);



    rendition.on("rendered", function(section){
      var nextSection = section.next();
      var prevSection = section.prev();

      if(nextSection) {
        nextNav = book.navigation.get(nextSection.href);

        if(nextNav) {
          nextLabel = nextNav.label;
        } else {
          nextLabel = "next";
        }

        next.textContent = nextLabel + " »";
      } else {
        next.textContent = "";
      }

      if(prevSection) {
        prevNav = book.navigation.get(prevSection.href);

        if(prevNav) {
          prevLabel = prevNav.label;
        } else {
          prevLabel = "previous";
        }

        prev.textContent = "« " + prevLabel;
      } else {
        prev.textContent = "";
      }

      // Add CFI fragment to the history
      //history.pushState({}, '', section.href);
      // window.location.hash = "#/"+section.href
    });

    rendition.on("relocated", function(location){
      // console.log(location);
    });

    book.loaded.navigation.then(function(toc){
      var $nav = document.getElementById("toc"),
          docfrag = document.createDocumentFragment();
      var addTocItems = function (parent, tocItems) {
        var $ul = document.createElement("ul");
        tocItems.forEach(function(chapter) {
          var item = document.createElement("li");
          var link = document.createElement("a");
          link.textContent = chapter.label;
          link.href = chapter.href;
          item.appendChild(link);

          if (chapter.subitems) {
            addTocItems(item, chapter.subitems)
          }

          link.onclick = function(){
            var url = link.getAttribute("href");
            rendition.display(url);
            return false;
          };

          $ul.appendChild(item);
        });
        parent.appendChild($ul);
      };

      addTocItems(docfrag, toc);

      $nav.appendChild(docfrag);

      if ($nav.offsetHeight + 60 < window.innerHeight) {
        $nav.classList.add("fixed");
      }

    });

    book.loaded.metadata.then(function(meta){
      var $title = document.getElementById("title");
      var $author = document.getElementById("author");
      var $cover = document.getElementById("cover");

      $title.textContent = meta.title;
      $author.textContent = meta.creator;
      if (book.archive) {
        book.archive.createUrl(book.cover)
          .then(function (url) {
            $cover.src = url;
          })
      } else {
        $cover.src = book.cover;
      }

    });
}