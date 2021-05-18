document.addEventListener("DOMContentLoaded", () => {
  const content = document.querySelectorAll(".content-js");

  // Only show the first 400 characters of a post's content if you are not on the view.php page
  function contentPreview() {
    for (let i = 0; i < content.length; i++) {
      if (content[i].innerHTML.length > 400) {
        content[i].innerHTML = content[i].innerHTML.substring(0, 400) + "...";
      }
    }
  }

  contentPreview();
});

const menuOpen = document.getElementById("menuOpen");
const menuClose = document.getElementById("menuClose");
const menu = document.getElementById("menu");

// Open menu when clicking on the bars icon
menuOpen.addEventListener("click", () => {
  function onClickHandle() {
    menu.classList.add("open-menu");
  }

  onClickHandle();
});

// Close menu when clicking on the "X"
menuClose.addEventListener("click", () => {
  function onClickHandle() {
    menu.classList.remove("open-menu");
  }

  onClickHandle();
});
