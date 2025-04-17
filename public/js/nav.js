const autoCollapseSubmenu = (event) => {
    if (event.target.matches('li.submenu>a.dropdown-item.dropdown-toggle')) {
        // prevent parent dropdown menu from collapsing on click
        event.stopPropagation();
        // find parent navbar element
        const navbar = event.target.closest('nav.navbar');
        // get the target submenu (the ul.dropdown-menu sibling of the clicked item)
        targetSubmenu = event.target.parentElement.querySelector('ul.dropdown-menu');
        // find any open submenu items
        // set class and aria attributes to closed unless element is clicked element or direct ancestor
        if (targetSubmenu) {
            navbar.querySelectorAll('li.submenu>ul.dropdown-menu.show').forEach((subMenu) => {
                if (!subMenu.contains(targetSubmenu)) {
                    // dropdown toggle link - remove 'show' class, set aria-expanded to fale
                    subMenu.classList.remove('show');
                    // Get the sibling ul.dropdown-menu
                    const dropDownToggle = subMenu.parentElement.querySelector('a[aria-expanded="true"].dropdown-item.dropdown-toggle');
                    if (dropDownToggle) {
                        // Remove the 'show' class
                        dropDownToggle.classList.remove('show');
                        dropDownToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });
        };
    }
};

document.querySelectorAll('nav.navbar').forEach((navbar) => {
    navbar.addEventListener('click', autoCollapseSubmenu);
});
