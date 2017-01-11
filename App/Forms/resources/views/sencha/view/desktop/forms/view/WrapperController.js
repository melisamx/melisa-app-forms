Ext.define('Melisa.forms.view.desktop.forms.view.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.forsmformview',
    
    requires: [
        'Melisa.forms.view.desktop.forms.items.HeaderItem'
    ],
    
    onRender: function() {
        this.build();
    },
    
    build: function() {
        
        var me = this,
            formConfig = me.getView().melisa,
            form = me.getView();
        
        Ext.each(formConfig.items, function(formItem) {
            
            switch (formItem.itemType) {
                case 'header':
                    
                    me.appendHeader(form, formItem);
                    break;
                    
                case 'radiogroup':
                    me.appendQuestionRadioGroup(form, formItem);
                    break;
                    
                default:
                    me.fireEvent('appenditemcustom', formItem.itemType, form, formItem);
                    break;
            }
            
        });
        
    },
    
    appendQuestionRadioGroup: function(form, config) {
        
        var me = this,
            configRadioGroup = Ext.applyIf(config.properties, {
                xtype: 'radiogroup',
                cls: 'question header',
                fieldLabel: config.title || 'Opción 1',
                labelAlign: 'top',
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
        
    }
    
});