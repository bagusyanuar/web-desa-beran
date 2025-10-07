import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/util/index.js",
                "resources/js/landing/index.js",
                "resources/js/util/slick.js",
            ],
            refresh: true,
        }),
    ],
});
