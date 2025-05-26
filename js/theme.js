// Check for saved theme preference, otherwise use system preference
const getPreferredTheme = () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        return savedTheme;
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
};

// Apply theme to document
const setTheme = (theme) => {
    document.documentElement.setAttribute('data-bs-theme', theme);
    localStorage.setItem('theme', theme);
    
    // Update icon in all theme toggles
    document.querySelectorAll('.theme-toggle-icon').forEach(icon => {
        icon.className = `bi ${theme === 'dark' ? 'bi-moon-stars-fill' : 'bi-sun-fill'} theme-toggle-icon`;
    });
};

// Initialize theme
setTheme(getPreferredTheme());

// Listen for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if (!localStorage.getItem('theme')) {
        setTheme(getPreferredTheme());
    }
});
