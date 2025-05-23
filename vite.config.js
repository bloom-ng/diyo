import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
        viteStaticCopy({
            targets: [
                {
                    src: "resources/fonts/*",
                    dest: "fonts",
                },
            ],
        }),
    ],
    resolve: {
        alias: {
            "/images": "/public/images",
            "/fonts": "/resources/fonts",
            "/storage": "/public/storage",
        },
    },
});
