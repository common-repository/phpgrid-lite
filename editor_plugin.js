(function () {
    tinymce.create('tinymce.plugins.PhpGrid', {
        init: function (ed, url) {
            
			var button_page=url+'/button_page.php';
            ed.addCommand('phpgridcmd', function () {
				/*
                ed.windowManager.open({
                    file: url + '/button_page.php',
                    width: 250 + parseInt(ed.getLang('phpgrid.delta_width', 0)),
                    height: 160 + parseInt(ed.getLang('phpgrid.delta_height', 0)),
                    inline: 1
                }, {
                    plugin_url: url
                });*/
            });

            
            ed.addButton('PhpGrid', {
                title: 'phpgrid title',
                cmd: 'phpgridcmd',
                image: url + '/button.gif',
				onclick : function(ed) 
				{
					jQuery.ajax({
			   			   url: button_page,
			   			   success: function(data)
			   				{
								
								if(data=='Error')
								{
									alert('Error');
								}
								else
								{
							 		var idlist=data.split(",");
									var dm = new tinymce.ui.DropMenu('mymenu', {container : tinyMCE.activeEditor.getContainer()});	
									for(var i=0;i<(idlist.length);i++)
									{
										//var tmp='[phpgrid id='+idlist[i]+']';
									
										dm.add({title : 'PhpGrid '+idlist[i],onclick : function(title){
											
											var data=this.title.split(' ');																											
											tinyMCE.execCommand('mceInsertContent',true,'[phpgrid id='+data[1]+']');
										return false;
										}});
									}
									dm.destroy();
									dm.showMenu(600, 300);	 
								}
								
								
			   				}
			 		});
					
				}
            });
			
        },

        getInfo: function () {
            return {
                longname: 'PhpGrid Plugin Button',
                author: 'Khitesh',
                authorurl: 'http://dnktechnologies.in',
                infourl: 'http://dnktechnologies.in',
                version: tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('PhpGrid', tinymce.plugins.PhpGrid);
})();