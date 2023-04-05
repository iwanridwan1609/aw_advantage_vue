
module.exports = {
    content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    theme: {
        extend: {
        colors: {
            "weather-primary": "#8fb1e9",
            "weather-secondary": "#a9d7f6",
        },
        },
            fontFamily: {
            Roboto: ["Roboto, sans-serif"],
        },
            container: {
            padding: "2rem",
            center: true,
        },
            screens: {
            sm: "640px",
            md: "768px",
        },
    },
    plugins: [],
}
