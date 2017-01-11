Ext.define('Melisa.forms.view.desktop.forms.view.Wrapper', {
    extend: 'Ext.form.Panel',
    alias: 'widget.formsformview',
    
    requires: [
        'Melisa.forms.view.desktop.forms.view.WrapperController'
    ],
    
    controller: 'forsmformview',
    cls: 'form',
    bodyPadding: '34 17'
    
});
