const views =
  {
    type: 'dir',
	name: 'app',
    children: [
      {
        type: 'file',
      },
      {
        type: 'dir',
        name: 'config'
	  },
	  {
        type: 'dir',
        name: 'controllers'
	  },
	  {
        type: 'dir',
        name: 'core'
	  },
	  {
        type: 'dir',
        name: 'model'
	  },
	  {
        type: 'dir',
        name: 'views',
        children: [
          {
			type: 'dir',
			name: 'layouts'
		  },
		  {
			type: 'dir',
			name: 'pages',
			children: [
				{
					type : 'file',
					name : 'welcome.php'
				}
			]
		  }
        ]
	  }
    ]
  };


const controllers =
  {
    type: 'dir',
	name: 'app',
    children: [
      {
        type: 'file',
      },
      {
        type: 'dir',
        name: 'config'
	  },
	  {
        type: 'dir',
		name: 'controllers',
		children: [
			{
				type: 'file',
				name: 'welcome.php'
			}
		]
	  },
	  {
        type: 'dir',
        name: 'core'
	  },
	  {
        type: 'dir',
        name: 'model'
	  },
	  {
        type: 'dir',
        name: 'views',
	  }
    ]
  };



function displayJsonTree( data) {
  var htmlRetStr = "<ul class='folder-container'>";
  for (var key in data) {
    if (typeof(data[key])== 'object' && data[key] != null) {
      htmlRetStr += displayJsonTree( data[key] );
      htmlRetStr += '</ul></li>';
    } else if(data[key]=='dir'){
      htmlRetStr += "<li class='folder-item'>" + data["name"]+"</li><li class='folder-wrapper'>";
    }
    else if( key=='name' && data['type']!='dir' ){
      htmlRetStr += "<li class='file-item'><b>" + data['name']+"</b></li>";
    }
  }
  return( htmlRetStr );
}

document.getElementById("views").innerHTML= displayJsonTree(views);
document.getElementById("controllers").innerHTML= displayJsonTree(controllers);