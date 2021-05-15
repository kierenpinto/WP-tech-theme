/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

(function() {
  const siteNavigation = document.getElementById('site-navigation');

  // Return early if the navigation don't exist.
  if (!siteNavigation) {
      console.error("Site navigation does not exist");
    return;
  }
    console.log("pass");
  //const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];
  const button = document.getElementById('menu-icon-svg');
  // Return early if the button does not exist.
  if ('undefined' === typeof button) {
      console.error("Button doesn't exist"); 
    return;
  }

  const menu = siteNavigation.getElementsByTagName('ul')[0];

  // Hide menu toggle button if menu is empty and return early.
  if ('undefined' === typeof menu) {
      console.error("Menu is empty");
    button.style.display = 'none';
    return;
  }

  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener('click', function() {
    console.log('toggle menu');
    siteNavigation.classList.toggle('toggled');

    if (button.getAttribute('aria-expanded') === 'true') {
      button.setAttribute('aria-expanded', 'false');
    } else {
      button.setAttribute('aria-expanded', 'true');
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener('click', function(event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove('toggled');
      button.setAttribute('aria-expanded', 'false');
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName('a');

  // Get all the link elements with children within the menu.
  /* const linksWithChildren = menu.querySelectorAll(
    '.menu-item-has-children > a, .page_item_has_children > a',
  ); */
  // Get all the navigation elements with the child down arrows of menu.
  const navWithChildArrows = menu.querySelectorAll(
    '.menu-item-has-children > span > i, .page_item_has_children > span > i',
  );
  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    //link.addEventListener('focus', toggleFocus, true);
    link.addEventListener('blur', toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event. (Disabled)
  /*
  for (const link of linksWithChildren) {
    link.addEventListener('touchstart', toggleFocus, false);
  }*/

  // Toggle focus each time a menu down arrow with children receive a touch event.
  for (const arrow of navWithChildArrows) {
      arrow.addEventListener('touchstart' ,toggleFocus, false)
  }
  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
      console.log("TOGGLE FOCUS");
    if (event.type === 'focus' || event.type === 'blur') {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains('nav-menu')) {
        // On li elements toggle the class .focus.
        if ('li' === self.tagName.toLowerCase()) {
          self.classList.toggle('focus');
        }
        self = self.parentNode;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = this.parentNode.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove('focus');
        }
      }
      menuItem.classList.toggle('focus');
    }
  }

  /**
   * Check for wordpress admin bar and alter the sticky height of nav accordingly.
   */
  function checkAdminBar() {
    const adminBar = document.getElementById('wpadminbar');
    if (adminBar) {
      const adminBarHeight = adminBar.clientHeight;
      document.body.style.setProperty(
        '--adminBarHeight',
        `${adminBarHeight}px`,
      );
    }
      console.log("Ran checkAdminBar()");
  }
  checkAdminBar(); // run once at the start
  window.addEventListener('resize', checkAdminBar);
})();
