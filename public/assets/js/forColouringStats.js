document.addEventListener("DOMContentLoaded", () => {
  const cards = Array.from(document.getElementsByClassName("colorful"));
  const textDecors = Array.from(document.getElementsByClassName("text-decor"));
  const btns = Array.from(document.getElementsByClassName("btn"));

  const colorArr = [
    "blue",
    "orange",
    "indigo",
    "emerald",
    "amber",
    "violet",
    "purple",
    "rose",
    "fuchsia",
    "teal",
    "blue",
    "orange",
    "indigo",
    "emerald",
    "amber",
    "violet",
    "purple",
    "rose",
    "fuchsia",
    "teal",
    "blue",
    "orange",
    "indigo",
    "emerald",
    "amber",
    "violet",
    "purple",
    "rose",
    "fuchsia",
    "teal",
    "blue",
    "orange",
    "indigo",
    "emerald",
    "amber",
    "violet",
    "purple",
    "rose",
    "fuchsia",
    "teal",
  ];

  cards.map((card, idx) => {
    const className = `bg-${colorArr[idx]}-400`;
    card.classList.add(className);
  });

  btns.map((btn, idx) => {
    const className = `bg-${colorArr[idx]}-800`;
    btn.classList.add(className);
  });
});
