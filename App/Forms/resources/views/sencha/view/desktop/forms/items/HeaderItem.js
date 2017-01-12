Ext.define('Melisa.forms.view.desktop.forms.items.HeaderItem', {
    extend: 'Ext.Container',
    alias: 'widget.formitemheader',
    
    cls: 'header',
    tpl: [
        '<h1 class="title">{title}</h1>',
        '<p class="description">{description}</p>'
    ]
    
});
