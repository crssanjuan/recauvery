function toggleNav() {
  /* create variables to reduce typing and space */
  var sidenav = document.getElementById("sidenav") /* sidebar menu */,
    chevron = document.getElementById(
      "chevron"
    ) /* this is the double chevron element housed in the span */,
    btn = document.getElementById(
      "openBtn"
    ) /* this is the button that houses the double chevron */,
    ariaValue = btn.getAttribute("aria-expanded");

  /* ternary operators are used to determine what the attribute value is and sets then changes the value accordingly */
  sidenav.style.width =
    sidenav.style.width === "175px"
      ? "0"
      : "175px"; /* if you want a wider sidebar menu, change both of the 175px */
  chevron.style.transform =
    chevron.style.transform === "rotate(-180deg)"
      ? "rotate(0deg)"
      : "rotate(-180deg)"; /* rotates the double chevron to indicate the direction the menu will go when clicked */
  btn.style.width =
    btn.style.width === "215px"
      ? "40px"
      : "215px"; /* moves the chevron button out/in with the sidebar menu.  If the button width or the sidebar menu width are changed, the numbers will need to be updated accordingly.  40px is the button's width, 215 is the button's width plus the sidebar menu width */

  /* for screenreaders: lets the user know if the menu is expanded (open) */
  ariaValue =
    ariaValue === "true"
      ? btn.setAttribute("aria-expanded", "false")
      : btn.setAttribute("aria-expanded", "true");
}
