<!DOCTYPE html>
<html lang="en">

<head>
  <title>Huis 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link type="text/css" rel="stylesheet" href="main.css">
  <style>
    <?php
      include 'assets/css/style.css';
    ?>
  </style>
</head>

<body>
  <div class="huis-nav">
        <a href="../home" class="huis-a-back">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="36" height="26" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
            </svg>
        </a>
        <p class="huis-title"></p>
    </div>
  <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>

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

    import {
      OrbitControls
    } from 'three/addons/controls/OrbitControls.js';
    import {
      GLTFLoader
    } from 'three/addons/loaders/GLTFLoader.js';
    import {
      RoomEnvironment
    } from 'three/addons/environments/RoomEnvironment.js';

    import {
      GUI
    } from 'three/addons/libs/lil-gui.module.min.js';

    let camera, scene, renderer, controls;

    init();
    animate();

    function init() {

      const container = document.createElement('div');
      document.body.appendChild(container);

      camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 2000);
      camera.position.set(600, 250, 600);

      scene = new THREE.Scene();

      var dak1 = {
        add: function() {
            loaddak();
        }
      };
      var dak2 = {
        add: function() {
          loaddak2();
        } 
      };

      var deur_var1 = {
        add: function() {
          loaddeur1();
        } 
      };
      var deur_var2 = {
        add: function() {
          loaddeur2();
        } 
      };
      var deur_var3 = {
        add: function() {
          loaddeur3();
        } 
      };

      var kozijn_var1 = {
        add: function() {
          loadkozijn1();
        } 
      };
      var kozijn_var2 = {
        add: function() {
          loadkozijn2();
        } 
      };
      var kozijn_var3 = {
        add: function() {
          loadkozijn3();
        } 
      };

      var obj2 = {
          add: function() {
              removeLoad(dak1)
              removeLoad(dak2)
              removeLoad(deur1)
              removeLoad(deur2)
              removeLoad(deur3)
          }
      };


      const gui = new GUI()
      const cubeFolder = gui.addFolder('Dak')
      cubeFolder.add(dak1, 'add').name('Dak 1!');
      cubeFolder.add(dak2, 'add').name('Dak 2!');
      // cubeFolder.add(obj2, 'add').name('Unload!');
      cubeFolder.add(deur_var1, 'add').name('Deur 1!');
      cubeFolder.add(deur_var2, 'add').name('Deur 2!');
      cubeFolder.add(deur_var3, 'add').name('Deur 3!');
      cubeFolder.add(kozijn_var1, 'add').name('Kozijn 1!');
      cubeFolder.add(kozijn_var2, 'add').name('Kozijn 2!');
      cubeFolder.add(kozijn_var3, 'add').name('Kozijn 3!');
      cubeFolder.open()

      var dak1;
      var dak2;
      var deur1;
      var deur2;
      var deur3;
      
      var kozijn1;
      var kozijn2;
      var kozijn3;

      var dak1_toggle = 0;

      new GLTFLoader()
          .setPath('../assets/final/')
          .load('huis/huis.glb', function(gltf) {
            scene.add(gltf.scene);
            const object = gltf.scene.getObjectByName('SheenChair_fabric');
        });

      function loaddak(){
        removeLoad(dak2)
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('dak/dak1.glb', function(gltf) {
              dak1 = gltf;
              scene.add(dak1.scene);
              const object = dak1.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function loaddak2(){
        removeLoad(dak1)

        new GLTFLoader()
            .setPath('../assets/final/')
            .load('dak/dak2.glb', function(gltf) {
              dak2 = gltf;
              scene.add(dak2.scene);
              const object = dak2.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function loaddeur1(){
        // removeLoad(deur2)
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('deur/deur1.glb', function(gltf) {
              deur1 = gltf;
              scene.add(deur1.scene);
              // const object = deur1.scene.getObjectByName('SheenChair_fabric');
        });
      }
      function loaddeur2(){
        
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('deur/deur2.glb', function(gltf) {
              deur2 = gltf;
              scene.add(deur2.scene);
              const object = deur2.scene.getObjectByName('SheenChair_fabric');
        });
      }
      function loaddeur3(){
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('deur/deur3.glb', function(gltf) {
              deur3 = gltf;
              scene.add(deur3.scene);
              const object = deur3.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function loadkozijn1(){
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('kozijn/kozijn1.glb', function(gltf) {
              kozijn1 = gltf;
              scene.add(kozijn1.scene);
              const object = kozijn1.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function loadkozijn2(){
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('kozijn/kozijn2.glb', function(gltf) {
              kozijn2 = gltf;
              scene.add(kozijn2.scene);
              const object = kozijn2.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function loadkozijn3(){
        new GLTFLoader()
            .setPath('../assets/final/')
            .load('kozijn/kozijn3.glb', function(gltf) {
              kozijn3 = gltf;
              scene.add(kozijn3.scene);
              const object = kozijn3.scene.getObjectByName('SheenChair_fabric');
        });
      }

      function removeLoad(object){
        scene.remove(object.scene)
      }


      renderer = new THREE.WebGLRenderer({
        antialias: true
      });
      renderer.setPixelRatio(window.devicePixelRatio);
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.toneMapping = THREE.ACESFilmicToneMapping;
      renderer.toneMappingExposure = 1;
      renderer.outputEncoding = THREE.sRGBEncoding;
      container.appendChild(renderer.domElement);

      const environment = new RoomEnvironment();
      const pmremGenerator = new THREE.PMREMGenerator(renderer);

      scene.background = new THREE.Color(0xC2733);
      scene.environment = pmremGenerator.fromScene(environment).texture;

      controls = new OrbitControls(camera, renderer.domElement);
      controls.enableDamping = true;
      controls.minDistance = 1;
      controls.maxDistance = 1000;
      controls.target.set(0, 0.35, 0);
      controls.update();

      window.addEventListener('resize', onWindowResize);

    }

    function onWindowResize() {

      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();

      renderer.setSize(window.innerWidth, window.innerHeight);

    }

    //

    function animate() {

      requestAnimationFrame(animate);

      controls.update(); // required if damping enabled

      render();

    }

    function render() {

      renderer.render(scene, camera);

    }
  </script>

</body>

</html>