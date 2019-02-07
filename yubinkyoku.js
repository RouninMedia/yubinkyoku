  //********************//
 // INITIALISE MODULES //
//********************//

const initialiseModules = (pageModules) => { 

  for (let module in pageModules) {

    let initial = pageModules[module][Symbol.for(module + '::initialise')];

    for (let initialComponent in initial) {

      initial[initialComponent]();
    }
  }
}
