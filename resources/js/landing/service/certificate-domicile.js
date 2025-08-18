document.addEventListener('alpine:init', () => {
    const STORE_NAME = 'SERVICE_DOMICILE_STORE';
    const STORE_PROPS = {
        component: null,
        init: function () {
            Livewire.hook('component.init', ({
                component
            }) => {
                const componentID = document.querySelector(
                    '[data-component-id="service-domicile"]')?.getAttribute('wire:id');
                if (component.id === componentID) {
                    this.component = component;
                    console.log('init');
                }
            });
        },
    };
    Alpine.store(STORE_NAME, STORE_PROPS);
});
