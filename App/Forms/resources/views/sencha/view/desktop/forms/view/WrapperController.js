Ext.define('Melisa.forms.view.desktop.forms.view.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.forsmformview',
    
    requires: [
        'Melisa.forms.view.desktop.forms.items.HeaderItem'
    ],
    
    build: function(id) {
        
        var me = this,
            form = me.getView(),
            url = form.getForm().url;
    
        if( Ext.isEmpty(url)) {
            return false;
        }
        
        form.setLoading('Abriendo formulario...');
        
        Ext.Ajax.request({
            url: url + id,
            method: 'GET',
            success: me.onSuccessGetForms,
            failure: me.onFailureGetForms,
            scope: me
        });
        
    },
    
    onSuccessGetForms: function(request) {
        
        var me = this,
            form = me.getView(),
            config = Ext.decode(request.responseText, true);
    
        form.setLoading(false);
        me.generate(config.data);
        
    },
    
    onFailureGetForms: function() {
        console.log('onFailureGetForms', arguments);
    },
    
    generate: function(config) {
        
        var me = this,
            form = me.getView();
        
        Ext.each(config.items, function(formItem) {
            
            switch (formItem.type) {
                case 'header':
                    
                    me.appendHeader(form, formItem);
                    break;
                    
                case 'question':
                    me.appendQuestionRadioGroup(form, formItem);
                    break;
                    
                default:
                    me.fireEvent('appenditemcustom', formItem.type, form, formItem);
                    break;
            }
            
        });
        
    },
    
    appendQuestionRadioGroup: function(form, config) {
        
        var me = this,
            configRadioGroup = Ext.applyIf(config.properties || {}, {
                xtype: 'radiogroup',
                cls: 'question header',
                fieldLabel: config.title || 'Opción 1',
                labelAlign: 'top',
                name: config.name || config.title,
                allowBlank: !config.required,
                msgTarget: 'under',
                blankText: 'Debe seleccionar un item de este grupo',
                items: []
            });
            
        if( config.name) {
            
            configRadioGroup.name = config.name;
            
        }
        
        Ext.each(config.options, function(option) {
            
            configRadioGroup.items.push(me.generateRadioField(option, configRadioGroup.name));
            
        });
        
        form.add(configRadioGroup);
        
    },
    
    generateRadioField: function(config, groupName) {
        
        var properties = Ext.applyIf(config.properties || {}, {
            boxLabel: config.text,
            inputValue: config.value || config.text
        });
        
        if( !properties.name) {
            
            properties.name = groupName;
            
        }
        
        return properties;
        
    },
    
    appendHeader: function(form, config) {
        
        form.add({
            xtype: 'formitemheader',
            data: {
                title: config.title,
                description: config.description
            }
        });
        
    },
    
    onClickBtnSend: function(button) {
        
        var me = this,
            view = me.getView(),
            event = {
                values: view.getValues(),
                form: view,
                cancel: false,
                button: button,
                params: {}
            };
            
        if( !view.isValid()) {
            console.log(view.getForm().getFieldValues());
            me.log('form invalid', view);
            return;
        }
    
        if( !view.fireEvent('beforesend', event) || event.cancel) {
            me.log('cancel send form', event);
            return;
        }
        
        console.log('paso');
    }
    
});