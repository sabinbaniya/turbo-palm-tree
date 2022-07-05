document.addEventListener("DOMContentLoaded", () => {
  const includes = Array.from(document.getElementsByClassName("includes"));
  includes?.map((includes) => {
    const tempArr = Array.from(includes.children);
    tempArr.map((el) => {
      if (
        el.innerText.includes("free") &&
        el.innerText.trim().endsWith("free")
      ) {
        el.innerText = el.innerText.split("free")[0];
        const sp = document.createElement("span");
        sp.classList.add(
          "bg-green-500",
          "rounded-full",
          "inline-block",
          "px-4",
          "py-1",
          "text-white"
        );
        sp.innerText = "Free";
        el.appendChild(sp);
      }
    });
  });

  const cards = Array.from(document.getElementsByClassName("card"));
  const textDecors = Array.from(document.getElementsByClassName("text-decor"));
  const btns = Array.from(document.getElementsByClassName("btn"));

  const colorArr = ["blue", "orange", "indigo", "emerald"];

  cards.map((card, idx) => {
    const className = `bg-${colorArr[idx]}-400`;
    card.classList.add(className);
  });

  textDecors.map((text, idx) => {
    const className = `decoration-${colorArr[idx]}-500`;
    text.classList.add(className);
  });

  btns.map((btn, idx) => {
    const className = `bg-${colorArr[idx]}-800`;
    btn.classList.add(className);
  });
});
