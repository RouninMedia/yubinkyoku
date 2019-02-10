"use strict";

const pageModules = {};
const myModules = ['logo', 'searchForm'];


for (let i = 0; i < myModules.length; i++) {

  import('/.assets/modules/' + myModules[i].toLowerCase() + '/design/scripts/' + myModules[i].toLowerCase() + '.js')

  .then(myModule => {

    pageModules[myModules[i]] = myModule;
    pageModules[myModules[i]] = pageModules[myModules[i]][myModules[i] + 'Module'];

    let initial = pageModules[myModules[i]][Symbol.for(myModules[i] + '::initialise')];

    for (let initialComponent in initial) {

      initial[initialComponent]();
    }

  })

  .catch(error => {

    console.log(error);

  });

}



  //********************//
 // INITIALISE MODULES //
//********************//

import {pageModules} from '/.assets/modules/modules.js';

const initialiseModules = (pageModules) => {

  for (let module in pageModules) {

    let initial = pageModules[module][Symbol.for(module + '::initialise')];

    for (let initialComponent in initial) {

      initial[initialComponent]();
    }
  }
}


initialiseModules(pageModules);
