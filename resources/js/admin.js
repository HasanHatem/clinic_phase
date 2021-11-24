require('./bootstrap');

const iniTabp = () => {
    // Navbar DropDown
    const openDropDown = () => {
        document.addEventListener('click', e => {
            const isDropDownButton = e.target.matches("[data-dropdown-button], svg, span");

            if (!isDropDownButton && e.target.closest('[data-dropdown]') !== null) return;

            let currentDropDown = null;

            if (isDropDownButton) {
                currentDropDown = e.target.closest('[data-dropdown]');
                currentDropDown.classList.toggle('active');
            }

            document.querySelectorAll('[data-dropdown].active').forEach(dropdown => {
                if (dropdown === currentDropDown) return;
                dropdown.classList.remove('active');
            });
        });
    };

    openDropDown();

    // Left sidebar
    const openLeftDrowDown = () => {
        document.addEventListener('click', e => {
            const isLeftDropDownButton = e.target.matches("[data-left-dropdown-button], i, span, div.arrow");

            if (!isLeftDropDownButton && e.target.closest('[data-left-dropdown]') !== null) return;

            let currentDropDown = null;

            if (isLeftDropDownButton) {
                currentDropDown = e.target.closest('[data-left-dropdown]');
                currentDropDown.classList.toggle('active');
            }

            // document.querySelectorAll('[data-left-dropdown].active').forEach(dropdown => {
            //     if (dropdown === currentDropDown) return;
            //     dropdown.classList.remove('active');
            // });
        })
    }

    openLeftDrowDown();

    // Switch Languages Tabs
    const switchLangsTabs = () => {
        let navTabs = document.querySelectorAll('[data-nav-tab]');

        navTabs.forEach((navTab) => {
            navTab.addEventListener('click', (e) => {
                e.preventDefault();

                // Get closest languages elements
                const languagesBox = e.target.closest('.languages');

                // Remove all active classes
                languagesBox.querySelector('a.active').classList.remove('active');

                // Add active class to currect nav tab
                navTab.classList.add('active');

                // Get tabs content elements
                const tabsContent = languagesBox.nextElementSibling.querySelector('[data-tabs-content]');

                // Remove active class form tab-pane
                tabsContent.querySelector('.tab-pane.active').classList.remove('active');

                // Add active class to current tab-pane
                tabsContent.querySelector(navTab.getAttribute('href')).classList.add('active');
            });
        });
    };

    switchLangsTabs();

    // Drop & Drag Image File
    const dropAndDrag = () => {
        const dropArea = document.querySelector('.drop-area');
        if (dropArea) {
            const input = document.querySelector('.drop-area--input');

            dropArea.addEventListener('click', e => {
                input.click();
            });

            input.addEventListener('change', e => {
                if (input.files.length) {
                    updateThumb(dropArea, input.files[0]);
                }
            });

            const active = () => dropArea.classList.add('drop-area--over');
            const inActive = () => dropArea.classList.remove('drop-area--over');

            const prevents = (e) => e.preventDefault();

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eName => {
                dropArea.addEventListener(eName, prevents);
            });

            ['dragenter', 'dragover'].forEach(eName => {
                dropArea.addEventListener(eName, active);
            });

            ['dragleave', 'drop'].forEach(eName => {
                dropArea.addEventListener(eName, inActive);
            });

            dropArea.addEventListener('drop', e => {
                const dt = e.dataTransfer;
                const image = dt.files[0];
                input.files = dt.files;
                updateThumb(dropArea, image);
            });
        }
    };

    const updateThumb = (dropArea, image) => {
        let thumbElement = dropArea.querySelector('.drop-area--thumb');

        // Delete promot if exists
        if (dropArea.querySelector('.promot')) {
            dropArea.querySelector('.promot').remove();
        }

        // Create thump element if not exists in first time
        if (!thumbElement) {
            thumbElement = document.createElement('div');
            thumbElement.classList.add('drop-area--thumb');
            dropArea.appendChild(thumbElement);
        }

        if (image.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.readAsDataURL(image);
            reader.onload = () => {
                thumbElement.style.backgroundImage = `url('${reader.result}')`;
            };

        } else {

        }
    }

    dropAndDrag();

    // Generate Slug From Names
    const generateSlug = () => {

        let nameInputs = document.querySelectorAll('input[data-name]');

        if (nameInputs) {
            nameInputs.forEach(nameInput => {

                nameInput.addEventListener('blur', (e) => {
                    e.preventDefault();

                    let nameInputValue = nameInput.value;
                    let id = nameInput.getAttribute('id');
                    let lang = id.replace('name', '');
                    let slug = '';

                    slug = nameInputValue.toLowerCase().trim();
                    slug = slug.search(' & ') > 0 ? slug.replace(/&/, 'and') : slug.replace(/&/, '-and-');
                    slug = slug.replace(/[^a-zA-Z1-9\w\u0621-\u064A\s ]/g, "");
                    slug = slug.replace(/\s+/g, '-');

                    document.querySelector(`#${lang}slug`).value = slug;
                });

            });
        }
    };

    generateSlug();

}

// Start the script
document.addEventListener('DOMContentLoaded', iniTabp);

