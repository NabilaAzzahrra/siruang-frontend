import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '0.0.0.0', // Biarkan terbuka untuk diakses dari jaringan lain
    //     port: 5173, // Sesuaikan jika perlu
    //     strictPort: true,
    //     hmr: {
    //         host: '192.168.120.92', // Ganti dengan IP Address laptop
    //     },
    // },
});
