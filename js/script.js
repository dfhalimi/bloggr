document.addEventListener("DOMContentLoaded", () => {
  const content = document.querySelectorAll(".content-js");

  function contentPreview() {
    for (let i = 0; i < content.length; i++) {
      if (content[i].innerHTML.length > 400) {
        content[i].innerHTML = content[i].innerHTML.substring(0, 400) + "...";
      }
    }
  }

  contentPreview();
});
