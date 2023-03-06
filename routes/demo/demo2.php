<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    <?php
        include 'assets/css/style.css';
    ?>
</style>
<body>
    <!-- <div class="huis-nav">
        <a href="../home" class="huis-a-back">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="36" height="26" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
            </svg>
        </a>
        <p class="huis-title">Huis 1</p>
    </div> -->
    
</body>

<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

<script type="importmap">
  {
    "imports": {
      "three": "https://prod-cdn.kruimeltaart.eu/admin/Code/three.module.js",
      "three/addons/": "https://prod-cdn.kruimeltaart.eu/admin/Code/jsm/"
    }
  }
</script>

<script type="module">
    import * as THREE from 'three';
    import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
    import { OBJLoader } from 'three/addons/loaders/OBJLoader.js';
    import { GUI } from 'three/addons/libs/lil-gui.module.min.js';

    const scene = new THREE.Scene();

    const renderer = new THREE.WebGLRenderer({ antialias: true });;
	const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
    const controls = new OrbitControls( camera, renderer.domElement );
	
    const loader = new OBJLoader();

	renderer.setSize( window.innerWidth, window.innerHeight );
	document.body.appendChild( renderer.domElement );

	// const geometry = new THREE.BoxGeometry( 1, 1, 1 );
	// const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
	// const cube = new THREE.Mesh( geometry, material );
	// scene.add( cube );

	camera.position.z = 300;
	camera.position.y = 80;
	camera.position.x = 100;

    const light = new THREE.SpotLight()
    // const light = new THREE.AmbientLight( 0x404040 );
    light.position.set(350, 340, 170)
    scene.add(light)

    var obj_test;

    function loadtavel(){
        loader.load(
            // resource URL
            '../assets/objtest.obj',
            // called when resource is loaded
            function ( object ) {

                obj_test = object
                scene.add( obj_test );
                // object.translateZ( 10 );
            },
            // called when loading is in progresses
            function ( xhr ) {

                console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );

            },
            // called when loading has errors
            function ( error ) {

                console.log( 'An error happened' );

            }
        );
    }


    loader.load(
        // resource URL
        '../assets/huis1/huis1.obj',
        // called when resource is loaded
        function ( object ) {
            
            scene.add( object );
            object.translateY( 10 );
        },
        // called when loading is in progresses
        function ( xhr ) {

            console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );

        },
        // called when loading has errors
        function ( error ) {

            console.log( 'An error happened' );

        }
    );
    renderer.setClearColor( 0xffffff, 0);
        

    function removeLoad(){
        scene.remove(obj_test)
        console.log("Hi")
    }

    // renderer.physicallyCorrectLights = true
    // renderer.shadowMap.enabled = true
    renderer.outputEncoding = THREE.sRGBEncoding
    

    // texture.encoding = THREE.sRGBEncoding;
    var obj = {
        add: function() {
            loadtavel();
        }
    };
    var obj2 = {
        add: function() {
            removeLoad()
        }
    };

    

	function animate() {
		requestAnimationFrame( animate );

		// cube.rotation.x += 0.01;
		// cube.rotation.y += 0.01;

		renderer.render( scene, camera );
	};

	animate();
    const gui = new GUI()
    const cubeFolder = gui.addFolder('Cube')
    cubeFolder.add(obj, 'add').name('Load!');
    cubeFolder.add(obj2, 'add').name('Unload!');
    cubeFolder.open()
</script>
</html>