/*  TABLE BUTTON
/*====================================================================*/
    
    (function() {

		tinymce.PluginManager.add('nz_table', function( editor, url ) {
			editor.addButton( 'nz_table', {
				title: 'Insert table',
				icon: 'table',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Insert table',
						body: [
							{
								type: 'textbox',
								name: 'textColor',
								label: 'Color',
								value: ''
							},
							{
								type: 'listbox',
								name: 'columns',
								label: 'Columns',
								'values': [
									{text: '1', value: '1'},
									{text: '2', value: '2'},
									{text: '3', value: '3'},
									{text: '4', value: '4'},
									{text: '5', value: '5'},
									{text: '6', value: '6'},
								]
							}
						],
						onsubmit: function( e ) {

							var columns   = e.data.columns;
							var textColor = e.data.textColor;
							var text = '<table class="nz-table"><thead style="color:'+textColor+';"><tr>';
							for(var i=1;i<=columns;i++) {
				                text += '<th>Column ' + i + '</th>';
				            }

				            text += '</tr></thead><tbody>';

				            for(var i=1;i<=columns;i++) {
				                text += '<tr>';
				                	for (var j = 1; j <= columns; j++) {
				                		text += '<td>Item #' + i+'.'+j + '</td>';
				                	};
				                text += '</tr>';
				            }
				            text += '</tbody></table>';
							editor.insertContent(text);
						}
					});
				}
			});
		});

	})();

/*  DROPCAP BUTTON
/*====================================================================*/
    
    (function() {
        tinymce.PluginManager.add('nz_dropcap', function( editor) {
            editor.addButton( 'nz_dropcap', {
                title : 'Add dropcap',
                icon: 'icon icon-dropcap',
                onclick: function() {
                    editor.selection.setContent('[nz_dropcap type="empty full" color=""]' + editor.selection.getContent() + '[/nz_dropcap]');  
                }
            });
        });
    })();

/*  POPUP BUTTON
/*====================================================================*/
    
    (function() {
        tinymce.PluginManager.add('nz_popup', function( editor) {
            editor.addButton( 'nz_popup', {
                title : 'Add popup',
                icon: 'icon icon-popup',
                onclick: function() {
                    editor.selection.setContent('[nz_popup message="Your popup message goes here" color="" /]');  
                }
            });
        });
    })();

/*  GAP BUTTON
/*====================================================================*/

    (function() {

        tinymce.PluginManager.add('nz_gap', function( editor) {
            editor.addButton( 'nz_gap', {
                title : 'Add gap',
                icon: 'icon icon-gap',
                onclick: function() {
                    editor.selection.setContent('[nz_gap height="25" /]');
                }
            });
        });

    })();

/*  HIGHLIGHT BUTTON
/*====================================================================*/
    
    (function() {
        tinymce.PluginManager.add('nz_highlight', function( editor) {
            editor.addButton( 'nz_highlight', {
                title : 'Add highlight',
                icon: 'icon icon-highlight',
                onclick: function() {
                    editor.selection.setContent('[nz_highlight color=""]' + editor.selection.getContent() + '[/nz_highlight]');  
                }
            });
        });
    })();

/*  ICON LIST BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_il', function( editor) {
            editor.addButton( 'nz_il', {
                title : 'Add icon list',
                icon: 'icon icon-icon-list',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert icon list',
						body: [
							{
								type: 'textbox',
								name: 'icon',
								label: 'Enter icon name',
								value: ''
							},
							{
								type: 'textbox',
								name: 'background_color',
								label: 'Background color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'icon_color',
								label: 'Icon color',
								value: ''
							},
							{
								type: 'listbox',
								name: 'type',
								label: 'Type',
								'values': [
									{text: 'none', value: 'none'},
									{text: 'square', value: 'square'},
									{text: 'circle', value: 'circle'}
								]
							}
						],
						onsubmit: function( e ) {
							var output           = '[nz_il ';
							var icon             = e.data.icon;
							var type             = e.data.type;
							var icon_color       = e.data.icon_color;
							var background_color = e.data.background_color;

							output += ' type="' + type + '" icon="' + icon + '" icon_color="' + icon_color + '" background_color="' + background_color + '" ]';
							output += '<ul><li>Item #1</li><li>Item #2</li><li>Item #3</li></ul>';
							output += '[/nz_il]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  BUTTON BUTTON
/*====================================================================*/
    
    (function() {
        tinymce.PluginManager.add('nz_btn', function( editor) {
            editor.addButton( 'nz_btn', {
                title : 'Add button',
                icon: 'icon icon-button',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert button',
						body: [
							{
								type: 'textbox',
								name: 'text',
								label: 'Text',
								value: 'Button text'
							},
							{
								type: 'textbox',
								name: 'link',
								label: 'Link',
								value: '#'
							},
							{
								type: 'listbox',
								name: 'target',
								label: 'Link target',
								'values': [
									{text: '_self', value: '_self'},
									{text: '_blank', value: '_blank'}
								]
							},
							{
								type: 'textbox',
								name: 'icon',
								label: 'Enter icon name',
								value: ''
							},
							{
								type: 'listbox',
								name: 'animate',
								label: 'Animate icon',
								'values': [
									{text: 'false', value: 'false'},
									{text: 'true', value: 'true'}
								]
							},
							{
								type: 'listbox',
								name: 'animation_type',
								label: 'Animation type',
								'values': [
									{text: 'ghost', value: 'ghost'},
									{text: 'reverse', value: 'reverse'}
								]
							},
							{
								type: 'listbox',
								name: 'color',
								label: 'Color',
								'values': [
									{text: 'default', value: 'default'},
									{text: 'blue', value: 'blue'},
									{text: 'turquoise', value: 'turquoise'},
									{text: 'pink', value: 'pink'},
									{text: 'violet', value: 'violet'},
									{text: 'peacoc', value: 'peacoc'},
									{text: 'chino', value: 'chino'},
									{text: 'mulled wine', value: 'mulled_wine'},
									{text: 'vista blue', value: 'vista_blue'},
									{text: 'black', value: 'black'},
									{text: 'grey', value: 'grey'},
									{text: 'orange', value: 'orange'},
									{text: 'sky', value: 'sky'},
									{text: 'green', value: 'green'},
									{text: 'juicy pink', value: 'yellow'},
									{text: 'sandy brown', value: 'sandy_brown'},
									{text: 'purple', value: 'purple'},
									{text: 'white', value: 'white'}
								]
							},
							{
								type: 'listbox',
								name: 'size',
								label: 'Size',
								'values': [
									{text: 'small', value: 'small'},
									{text: 'medium', value: 'medium'},
									{text: 'large', value: 'large'}
								]
							},
							{
								type: 'listbox',
								name: 'shape',
								label: 'Shape',
								'values': [
									{text: 'square', value: 'square'},
									{text: 'rounded', value: 'rounded'},
									{text: 'round', value: 'round'}
								]
							},
							{
								type: 'listbox',
								name: 'type',
								label: 'Type',
								'values': [
									{text: 'normal', value: 'normal'},
									{text: 'ghost', value: 'ghost'},
									{text: '3d', value: '3d'}
								]
							},
							{
								type: 'listbox',
								name: 'hover_normal',
								label: 'Normal button hover effect (only if icon animation is off)',
								'values': [
									{text: 'fill', value: 'fill'},
									{text: 'opacity', value: 'opacity'}
								]
							},
							{
								type: 'listbox',
								name: 'hover_ghost',
								label: 'Ghost button hover effect (only if icon animation is off)',
								'values': [
									{text: 'fill', value: 'fill'},
									{text: 'drop', value: 'drop'},
									{text: 'side', value: 'side'},
									{text: 'scene', value: 'scene'},
									{text: 'screen', value: 'screen'}
								]
							},
							{
								type: 'textbox',
								name: 'el_class',
								label: 'Extra class name',
								value: ''
							},
						],
						onsubmit: function( e ) {
							var output = '[nz_btn ';
							var text   = e.data.text;
							var link = e.data.link;
							var target = e.data.target;
							var icon = e.data.icon;
							var animate = e.data.animate;
							var animation_type = e.data.animation_type;
							var color = e.data.color;
							var size = e.data.size;
							var shape = e.data.shape;
							var type = e.data.type;
							var hover_normal = e.data.hover_normal;
							var hover_ghost = e.data.hover_ghost;
							var el_class = e.data.el_class;

							output += ' text="'+ text + '" link="' + link + '" target="' + target + '" icon="' + icon + '" animate="' + animate + '" animation_type="' + animation_type + '" color="' + color + '" size="' + size + '" shape="' + shape + '" type="' + type + '" hover_normal="' + hover_normal + '" hover_ghost="' + hover_ghost + '" el_class="' + el_class + '" /]';
							
							editor.insertContent(output);
						}
					});
				}
            });
        });
    })();

/*  SPLITTER BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_sep', function( editor) {
            editor.addButton( 'nz_sep', {
                title : 'Add separator',
                icon: 'icon icon-separator',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert splitter',
						body: [
							{
								type: 'listbox',
								name: 'type',
								label: 'Separator type',
								'values': [
									{text: 'solid', value: 'solid'},
									{text: 'dotted', value: 'dotted'},
									{text: 'dashed', value: 'dashed'}
								]
							},
							{
								type: 'textbox',
								name: 'color',
								label: 'Separator color',
								value: '#e0e0e0'
							},
							{
								type: 'textbox',
								name: 'top',
								label: 'Gap from top',
								value: '20'
							},
							{
								type: 'textbox',
								name: 'bottom',
								label: 'Gap from bottom',
								value: '20'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Width in px (without any string)',
								value: ''
							},
							{
								type: 'textbox',
								name: 'height',
								label: 'Height in px (without any string)',
								value: ''
							},
							{
								type: 'listbox',
								name: 'align',
								label: 'Align',
								'values': [
									{text: 'left', value: 'left'},
									{text: 'right', value: 'right'},
									{text: 'center', value: 'center'}
								]
							}
						],
						onsubmit: function( e ) {
							var output = '[nz_sep ';
							var top    = e.data.top;
							var bottom = e.data.bottom;
							var width  = e.data.width;
							var height = e.data.height;
							var type   = e.data.type;
							var color  = e.data.color;
							var align  = e.data.align;

							output += ' top="'+ top + '" bottom="' + bottom + '" width="' + width + '" height="' + height + '" type="' + type + '" color="' + color + '" align="' + align + '" /]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  ICON BUTTON
/*====================================================================*/
    
    (function() {
        tinymce.PluginManager.add('nz_icons', function( editor) {
            editor.addButton( 'nz_icons', {
                title : 'Add icon',
                icon: 'icon icon-icons',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert icon',
						body: [
							{
								type: 'textbox',
								name: 'icon',
								label: 'Icon name',
								value: 'icon-happy'
							},
							{
								type: 'listbox',
								name: 'type',
								label: 'Icon type',
								'values': [
									{text: 'none', value: 'none'},
									{text: 'circle', value: 'circle'},
									{text: 'square', value: 'square'}
								]
							},
							{
								type: 'listbox',
								name: 'size',
								label: 'Icon size',
								'values': [
									{text: 'small', value: 'small'},
									{text: 'medium', value: 'medium'},
									{text: 'large', value: 'large'}
								]
							},
							{
								type: 'listbox',
								name: 'animate',
								label: 'Animate icon',
								'values': [
									{text: 'false', value: 'false'},
									{text: 'true', value: 'true'}
								]
							},
							{
								type: 'textbox',
								name: 'icon_color',
								label: 'Icon color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'background_color',
								label: 'Background color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'border_color',
								label: 'Border color',
								value: ''
							}
							
						],
						onsubmit: function( e ) {
							var output      = '[nz_icons ';
							var icon        = e.data.icon;
							var animate     = e.data.animate;
							var size        = e.data.size;
							var type        = e.data.type;
							var iconColor   = e.data.icon_color;
							var backColor   = e.data.background_color;
							var borderColor = e.data.border_color;

							output += ' icon="' + icon + '" animate="' + animate + '" size="' + size + '" type="' + type + '" icon_color="' + iconColor + '" background_color="' + backColor + '" border_color="' + borderColor + '" /]';
							
							editor.insertContent(output);
						}
					});
				}
            });
        });
    })();

/*  YOUTUBE BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_youtube', function( editor) {
            editor.addButton( 'nz_youtube', {
                title : 'Add youtube video',
                icon: 'icon icon-youtube',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert youtube',
						body: [
							{
								type: 'textbox',
								name: 'id',
								label: 'Video ID',
								value: 'KDOLHClNTOI'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Video width',
								value: ''
							}
						],
						onsubmit: function( e ) {
							var output = '[nz_youtube ';
							var id    = e.data.id;
							var width  = e.data.width;

							output += ' id="'+ id + '" width="' + width + '" /]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  VIMEO BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_vimeo', function( editor) {
            editor.addButton( 'nz_vimeo', {
                title : 'Add vimeo video',
                icon: 'icon icon-vimeo',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert vimeo',
						body: [
							{
								type: 'textbox',
								name: 'id',
								label: 'Video ID',
								value: '5121526'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Video width',
								value: ''
							}
						],
						onsubmit: function( e ) {
							var output = '[nz_vimeo ';
							var id    = e.data.id;
							var width  = e.data.width;

							output += ' id="'+ id + '" width="' + width + '" /]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  YOUTUBE BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_you', function( editor) {
            editor.addButton( 'nz_you', {
                title : 'Add youtube video',
                icon: 'icon icon-yout',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert youtube',
						body: [
							{
								type: 'textbox',
								name: 'id',
								label: 'Video ID',
								value: 'KDOLHClNTOI'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Video width',
								value: ''
							}
						],
						onsubmit: function( e ) {
							var output = '[nz_you ';
							var id    = e.data.id;
							var width  = e.data.width;

							output += ' id="'+ id + '" width="' + width + '" /]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  VIMEO BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_vim', function( editor) {
            editor.addButton( 'nz_vim', {
                title : 'Add vimeo video',
                icon: 'icon icon-vim',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert vimeo',
						body: [
							{
								type: 'textbox',
								name: 'id',
								label: 'Video ID',
								value: '5121526'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Video width',
								value: ''
							}
						],
						onsubmit: function( e ) {
							var output = '[nz_vim ';
							var id    = e.data.id;
							var width  = e.data.width;

							output += ' id="'+ id + '" width="' + width + '" /]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  COLORBOX BUTTON
/*====================================================================*/
    
    (function() {

        tinymce.PluginManager.add('nz_colorbox', function( editor) {
            editor.addButton( 'nz_colorbox', {
                title : 'Add colorbox',
                icon: 'icon icon-colorbox',
                onclick: function() {
					editor.windowManager.open( {
						title: 'Insert colorbox',
						body: [
							{
								type: 'textbox',
								name: 'border_width',
								label: 'Border width',
								value: ''
							},
							{
								type: 'textbox',
								name: 'border_color',
								label: 'Border color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'background_color',
								label: 'Background color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'color',
								label: 'Color',
								value: ''
							},
							{
								type: 'textbox',
								name: 'padding',
								label: 'Padding',
								value: '20px 20px 20px 20px'
							},
							{
								type: 'textbox',
								name: 'width',
								label: 'Width',
								value: ''
							},
							
						],
						onsubmit: function( e ) {
							var border_width     = e.data.border_width;
							var border_color     = e.data.border_color;
							var background_color = e.data.background_color;
							var color            = e.data.color;
							var padding          = e.data.padding;
							var width            = e.data.width;
							var output = '[nz_colorbox border_width="' + border_width + '" border_color="' + border_color + '" background_color="' + background_color + '" color="' + color + '" padding="' + padding + '" width="' + width + '"]' + editor.selection.getContent() + '[/nz_colorbox]';
							editor.insertContent(output);
						}
					});
				}
            });
        });

    })();

/*  FONT WEIGHT BUTTON
/*====================================================================*/
    
    (function() {

		tinymce.PluginManager.add('nz_fw', function( editor, url ) {
			editor.addButton( 'nz_fw', {
				title: 'Custom font-weight',
				text: 'Font-weight',
				type: 'menubutton',
				icon: false,
				menu: [
					{
						text: '100',
						onclick: function() {editor.insertContent('<span style="font-weight:100;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '200',
						onclick: function() {editor.insertContent('<span style="font-weight:200;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '300',
						onclick: function() {editor.insertContent('<span style="font-weight:300;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '400',
						onclick: function() {editor.insertContent('<span style="font-weight:400;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '500',
						onclick: function() {editor.insertContent('<span style="font-weight:500;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '600',
						onclick: function() {editor.insertContent('<span style="font-weight:600;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '700',
						onclick: function() {editor.insertContent('<span style="font-weight:700;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '800',
						onclick: function() {editor.insertContent('<span style="font-weight:800;">'+editor.selection.getContent()+'</span>');}
					},
					{
						text: '900',
						onclick: function() {editor.insertContent('<span style="font-weight:900;">'+editor.selection.getContent()+'</span>');}
					},
				]
			});
		});

	})();

/*  COLUMNS BUTTON
/*====================================================================*/
    
    (function() {

		tinymce.PluginManager.add('nz_col', function( editor, url ) {
			editor.addButton( 'nz_col', {
				title: 'Insert columns',
				icon: 'columns',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Insert columns',
						body: [
							{
								type: 'listbox',
								name: 'count',
								label: 'Columns',
								'values': [
									{text: '1/4 + 1/4 + 1/4 + 1/4', value: '4'},
									{text: '1/3 + 1/3 + 1/3', value: '3'},
									{text: '1/2 + 1/2', value: '2'}
								]
							}
						],
						onsubmit: function( e ) {

							var count   = e.data.count;
							var output = '';
							output += '[nz_row]';

								for(var i=1;i<=count;i++) {
									output += '[nz_col width="'+count+'"]';
										output += 'Column '+i;
									output += '[/nz_col]';
					            }

				            output += '[/nz_row]';

							editor.insertContent(output);
						}
					});
				}
			});
		});

	})();