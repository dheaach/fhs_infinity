var UITree = function () {

    var handleSample1 = function (obj_check='') {
        const jsondata = [{
                            "text": "Dashboard",
                            "id":"1",
                            "state": {
                                 "selected": false   
                            }
                        },{
                            "text": "Master",
                            "id": "2",
                            "state": {
                                "opened": true,
                                "selected": false
                            },
                            "children": [{
                                "text": "Barang",
                                "id": "21",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "21A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "21B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "21C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "21D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "21E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "21F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tampil Harga Jual",
                                    "id": "21G",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tampil Harga Beli",
                                    "id": "21H",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "Kategori",
                                "id": "22",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "22A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "22B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "22C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "22D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "22E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "22F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "Sub-Kategori",
                                "id": "23",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "23A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "23B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "23C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "23D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "23E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "23F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            }]
                    },{
                            "text": "Produksi",
                            "id": "3",
                            "state": {
                                "opened": true,
                                 "selected": false
                            },
                            "children": [{
                                "text": "Bahan Baku Manufaktur",
                                "id": "31",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "31A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "31B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "31C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "31D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "31E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "31F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "Role Manufaktur",
                                "id": "32",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "32A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "32B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "32C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "32D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "32E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "32F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "Proses Manufaktur",
                                "id": "33",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "33A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "33B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "33C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "33D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "33E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "33F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            }]
                    },{
                            "text": "Trial",
                            "id": "4",
                            "state": {
                                "opened": true,
                                 "selected": false
                            },
                            "children": [{
                                "text": "Proses Trial",
                                "id": "41",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "41A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "41B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "41C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "41D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "41E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "41F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            }]
                    },{
                            "text": "Setting",
                            "id": "5",
                            "state": {
                                "opened": true,
                                "selected": false
                            },
                            "children": [{
                                "text": "Profile Outlet",
                                "id": "51",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "51A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "51B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "User Setting",
                                "id": "52",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "52A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "52B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "52C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "52D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "52E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "52F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "User Akses",
                                "id": "53",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                     "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "53A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "53B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "53C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "53D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            }]
                    }];

        const getObjects = (obj, key, val, newVal) => {
            var newValue = newVal;
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                    objects = objects.concat(getObjects(obj[i], key, val, newValue));
                } else if (i == key && obj[key] == val) {
                    obj['state'].selected = newValue;
                }
            }
            return obj;
        };

        var rt = obj_check.split(" ");

        for(var bc in rt){
            getObjects(jsondata, 'id', bc, true);
        }

        $('#tree_1').jstree({
            'plugins': ["wholerow", "checkbox", "types"],
            'core': {
                "themes" : {
                    "responsive": false
                },    
                'data': jsondata
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            }
        });
    }
    var handleSample2 = function (obj_check='') {
        const jsondata = [{
                            "text": "Dashboard",
                            "id":"1",
                            "state": {
                                "disabled": true, "selected": false   
                            }
                        },{
                            "text": "Master",
                            "id": "2",
                            "state": {
                                "opened": true,
                                "disabled":true, "selected": false
                            },
                            "children": [{
                                "text": "Profile Outlet",
                                "id": "51",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "51A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "51B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Barang",
                                "id": "21",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "21A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "21B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "21C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "21D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "21E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "21F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tampil Harga Jual",
                                    "id": "21G",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                },{
                                    "text": "Tampil Harga Beli",
                                    "id": "21H",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                         "selected": false
                                    }
                                }]
                            },{
                                "text": "Supplier",
                                "id": "54",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "54A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "54B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "54C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "54D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "54E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "54F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Customer",
                                "id": "55",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "55A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "55B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "55C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "55D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "55E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "55F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Sales",
                                "id": "56",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "56A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "56B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "56C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "56D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "56E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "56F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Kategori",
                                "id": "22",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "22A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "22B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "22C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "22D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "22E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "22F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Varian",
                                "id": "23",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "23A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "23B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "23C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "23D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "23E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "23F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Sub-Varian",
                                "id": "24",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "24A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "24B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "24C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "24D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "24E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "24F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Merk",
                                "id": "25",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "25A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "25B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "25C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "25D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "25E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "25F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Rak",
                                "id": "26",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "26A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "26B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "26C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "26D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "26E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "26F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Rak Wh",
                                "id": "27",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "27A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "27B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "27C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "27D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "27E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "27F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Branch",
                                "id": "28",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "28A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "28B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "28C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "28D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "28E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "28F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Warehouse",
                                "id": "29",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "29A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "29B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "29C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "29D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "29E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "29F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "ToP",
                                "id": "57",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "57A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "57B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "57C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "57D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "57E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "57F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "COA",
                                "id": "58",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "58A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "58B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "58C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "58D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "58E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "58F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "Bank",
                                "id": "59",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "59A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "59B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "59C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "59D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "59E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "59F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "User Setting",
                                "id": "52",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "52A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "52B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "52C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "52D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Import",
                                    "id": "52E",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Export",
                                    "id": "52F",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            },{
                                "text": "User Akses",
                                "id": "53",
                                "icon" : "fa fa-folder icon-state-default",
                                "state": {
                                    "disabled": true, "selected": false
                                },
                                "children": [{
                                    "text": "Tampil",
                                    "id": "53A",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Tambah",
                                    "id": "53B",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Edit",
                                    "id": "53C",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                },{
                                    "text": "Hapus",
                                    "id": "53D",
                                    "icon" : "fa fa-file icon-state-default",
                                    "state": {
                                        "opened": false,
                                        "disabled": true, "selected": false
                                    }
                                }]
                            }]
                    }];

        const getObjects = (obj, key, val, newVal) => {
            var newValue = newVal;
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                    objects = objects.concat(getObjects(obj[i], key, val, newValue));
                } else if (i == key && obj[key] == val) {
                    obj['state'].selected = newValue;
                }
            }
            return obj;
        };

        var rt = obj_check.split(" ");

        for(var bc in rt){
            getObjects(jsondata, 'id', bc, true);
        }

        $('#tree_2').jstree({
            'plugins': ["wholerow", "checkbox", "types"],
            'core': {
                "themes" : {
                    "responsive": false
                },    
                "data" : jsondata
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            }
        });

        // $('#tree_2').jstree(true).open_all();
        // $('li[data-checkstate="checked"]').each(function() {
        //     $('#tree_2').jstree('check_node', $(this));
        // });
        // $('#tree_2').jstree(true).close_all();

    }
    return {
        //main function to initiate the module
        init: function () {
            handleSample1();
            handleSample2();
        }

    };

}();