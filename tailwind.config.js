module.exports = {
  purge: [
    './resources/**/*.vue',
    './resources/**/*.php',
  ],
  theme: {
    extend: {
        translate: {
            full: "100%"
        }
    },
  },
  variants: {
      rotate: ["responsive", "hover", "group-hover"],
      scale: ["responsive", "hover", "group-hover"]
  },
  plugins: [],
}
