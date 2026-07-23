import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                slate: {
                    25: '#fcfdfe',
                },
            },
            fontSize: {
                '2xs': ['0.6875rem', { lineHeight: '1rem' }],
            },
            spacing: {
                '4.5': '1.125rem',
                '13': '3.25rem',
                '18': '4.5rem',
                '88': '22rem',
                'lg': '20px',
                'xl': '24px',
                'gutter': '20px',
            },
            maxWidth: {
                'sidebar': '224px',
                'sidebar-collapsed': '64px',
                'drawer': '480px',
                'container': '1200px',
            },
            width: {
                'sidebar': '224px',
                'sidebar-collapsed': '64px',
                'drawer': '480px',
            },
            boxShadow: {
                'sidebar': '1px 0 0 0 #e2e8f0',
                'card': '0 1px 2px 0 rgba(0, 0, 0, 0.03)',
                'card-hover': '0 4px 6px -1px rgba(0, 0, 0, 0.06), 0 2px 4px -2px rgba(0, 0, 0, 0.06)',
                'drawer': '-4px 0 24px 0 rgba(0, 0, 0, 0.12)',
                'modal': '0 24px 48px -12px rgba(0, 0, 0, 0.25)',
                'sm': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            },
            animation: {
                'slide-in': 'slide-in 0.2s ease-out',
                'slide-out': 'slide-out 0.2s ease-in',
                'fade-in': 'fade-in 0.15s ease-out',
                'fade-out': 'fade-out 0.15s ease-in',
            },
            keyframes: {
                'slide-in': {
                    '0%': { transform: 'translateX(100%)' },
                    '100%': { transform: 'translateX(0)' },
                },
                'slide-out': {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(100%)' },
                },
                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                'fade-out': {
                    '0%': { opacity: '1' },
                    '100%': { opacity: '0' },
                },
            },
        },
    },

    plugins: [forms],
};
