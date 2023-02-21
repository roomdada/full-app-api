import { defineConfig, loadEnv } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'


export default defineConfig(({ command, mode }) => {
    //Load the env variables that are prefixed with VITE_
    const env = loadEnv(mode, process.cwd(), 'VITE_')

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: [
                    ...refreshPaths,
                    'app/Http/Livewire/**',
                    'app/Tables/Columns/**',
                ],
            }),
        ],

        server: {
            hmr: {
                protocol: 'wss',
                host: env.VITE_APP_URL,
            },
        },
    }
})
