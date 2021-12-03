document.addEventListener('alpine:init', () => {
    // storing variable globally
    Alpine.store('sidebar', {
        full: false,
        active: 'home',
        navOpen: false
    });
    // creating component dropdown
    Alpine.data('dropdown', () => ({
        open: false,
        toggle(tab) {
            this.open = !this.open;
            Alpine.store('sidebar').active = tab;
        },

        activeClass: 'text-cool-gray-200 bg-cool-gray-200',
        expandedClass: 'border-l border-cool-gray-400 ml-4 pl-4',
        shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-cool-gray-800 sm:rounded-md sm:p-4 border-l sm:border-none border-cool-gray-400 ml-4 pl-4 sm:ml-0 w-40'
    }));
    // creating component sub dropdown
    Alpine.data('sub_dropdown', () => ({
        sub_open: false,
        sub_toggle() {
            this.sub_open = !this.sub_open;
        },

        sub_expandedClass: 'border-l border-cool-gray-400 ml-4 pl-4',
        sub_shrinkedClass: 'sm:absolute top-0 left-44 sm:shadow-md sm:z-10 sm:bg-cool-gray-800 sm:rounded-md sm:p-4 border-l sm:border-none border-cool-gray-400 ml-4 pl-4 sm:ml-0 w-40'
    }));
    // Creating too
    Alpine.data('tooltip', () => ({
        show:false,
        visibleClass: 'block sm:absolute -top-7 sm:border border-cool-gray-800 left-5 sm:text-sm sm:bg-gray-800 sm:px-2 sm:py-1 sm:rounded-md'
    }));
});
