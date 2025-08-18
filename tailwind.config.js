const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#e6eef5',
                    100: '#c0d4e5',
                    200: '#96b7d3',
                    300: '#6c9ac1',
                    400: '#4a7fb0',
                    500: '#003462',
                    600: '#002e58',
                    700: '#00264c',
                    800: '#001d3f',
                    900: '#000e2b',
                },
                accent: {
                    50: '#e5f8eb',
                    100: '#bff0ce',
                    200: '#92e7ac',
                    300: '#65dd89',
                    400: '#3bd566',
                    500: '#19B53D',
                    600: '#149a33',
                    700: '#0f7f2a',
                    800: '#0b6420',
                    900: '#064815',
                },
                neutral: {
                    50: '#fafafa',
                    100: '#f5f5f5',
                    200: '#e4e4e7',
                    300: '#d4d4d8',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                },
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/views/**/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        "./node_modules/flowbite/**/*.js",
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin'),
    ],
}
