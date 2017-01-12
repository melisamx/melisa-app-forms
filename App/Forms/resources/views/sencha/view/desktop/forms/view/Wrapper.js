Ext.define('Melisa.forms.view.desktop.forms.view.Wrapper', {
    extend: 'Ext.form.Panel',
    alias: 'widget.formsformview',
    
    requires: [
        'Melisa.forms.view.desktop.forms.view.WrapperController'
    ],
    
    controller: 'forsmformview',
    cls: 'form',
    bodyPadding: '34 17',
    bbar: [
        {
            xtype: 'button',
            cls: 'btnSend',
            scale: 'large',
            text: 'Enviar',
            listeners: {
                click: 'onClickBtnSend'
            }
        }
    ],
    
    build: function(url) {
        
        var me = this,
            controller = me.getController();
    
        return controller.build(url);
        
    }
    
});
