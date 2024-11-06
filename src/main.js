import './assets/main.css'

import { createApp } from 'vue'

// auto animate library
import { autoAnimatePlugin } from '@formkit/auto-animate/vue'
import App from './App.vue'

const app = createApp(App)

app.use(autoAnimatePlugin)

app.mount('#app')
