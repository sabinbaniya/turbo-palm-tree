const course_name = document.getElementById("course_name");
const course_title = document.getElementById("course_title");
const course_price = document.getElementById("course_price");
const course_description = document.getElementById("course_description");
const course_curriculum_brief = document.getElementById(
  "course_curriculum_brief"
);
const course_aim = document.getElementById("course_aim");
const course_objectives = document.getElementById("course_objectives");
const course_salient_features = document.getElementById(
  "course_salient_features"
);
const course_entry_criteria = document.getElementById("course_entry_criteria");
const btn = document.getElementById("btn");
const course_url = document.getElementById("course_url");

course_name.addEventListener("input", check_input);
course_title.addEventListener("input", check_input);
course_price.addEventListener("input", check_input);

function check_input(ev) {
  if (ev.target.getAttribute("id") === "course_name") {
    generate_url(ev);
  }
  if (course_name.value && course_title.value && course_price.value) {
    return activate_button();
  }
  deactivate_button();
}

function activate_button() {
  btn.disabled = false;
  btn.classList.remove("cursor-not-allowed");
  btn.classList.remove("bg-blue-300");
  btn.classList.add("bg-blue-500");
  btn.classList.add("hover:bg-blue-400");
  btn.classList.add("cursor-pointer");
}

function deactivate_button() {
  btn.disabled = true;
  btn.classList.add("cursor-not-allowed");
  btn.classList.add("bg-blue-300");
  btn.classList.remove("bg-blue-500");
  btn.classList.remove("hover:bg-blue-400");
  btn.classList.remove("cursor-pointer");
}

function generate_url(ev) {
  let content = ev.target.value;
  if (content.length === 0) {
    course_url.value = "";
    return;
  }
  content = content.toLowerCase().replace(/\s+/g, " ").trim();
  const tempArr = content.split(" ");
  const generated_url = tempArr.join("-");
  course_url.value = generated_url + ".php";
}
