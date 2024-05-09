import {defineConfig} from 'sanity'
import {structureTool} from 'sanity/structure'
import {visionTool} from '@sanity/vision'
//import {googleMapsInput} from '@sanity/google-maps-input'
import {schemaTypes} from './schemaTypes'
import {assist} from '@sanity/assist'

export default defineConfig({
    name: 'default',
    title: 'SLAY Demo',

    projectId: 'bl5z37mx',
    dataset: 'production',

    plugins: [
        assist(),
        structureTool(),
        visionTool(),
        //googleMapsInput(),
    ],

    schema: {
        types: schemaTypes,
    },
})
