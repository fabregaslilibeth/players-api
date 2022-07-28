# installing UI with vue

Errors encountered
`Cannot find module 'webpack/lib/rules/DescriptionDataMatcherRulePlugin'`

Solved by running
`npm i vue-loader`

# Adding tailwind CSS
`npm install -D tailwindcss@latest postcss@latest autoprefixer@latest`

`npx tailwindcss init`

Add these to webpack.mix.js
```
.postCss("resources/css/app.css", "public/css", [

     require("tailwindcss"),
    ]);
```

Add these to resources/app.css
```
@tailwind base;
@tailwind components;
@tailwind utilities;
```

Make sure to put this inside the head
`<link href="{{ asset('css/app.css') }}" rel="stylesheet">`

