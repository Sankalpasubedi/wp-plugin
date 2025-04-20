const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;

registerBlockType('hello/hello-block', {
    title: 'Hello Block',
    icon: 'smiley',
    category: 'common',

    edit: () => createElement('p', {}, 'Hello! From the editor!'),
    save: () => createElement('p', {}, 'Hello! From the front!'),
})