"use strict";

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
