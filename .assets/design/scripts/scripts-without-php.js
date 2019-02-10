"use strict";

const pageModules = {};
const moduleList = ['logo', 'searchForm'];


for (let i = 0; i < moduleList.length; i++) {

  import('/.assets/modules/' + moduleList[i].toLowerCase() + '/design/scripts/' + moduleList[i].toLowerCase() + '.js')

  .then(currentModule => {

    pageModules[moduleList[i]] = currentModule;
    pageModules[moduleList[i]] = pageModules[moduleList[i]][moduleList[i] + 'Module'];

    let initial = pageModules[moduleList[i]][Symbol.for(moduleList[i] + '::initialise')];

    for (let initialComponent in initial) {

      initial[initialComponent]();
    }

  })

  .catch(error => {

    console.log(error);

  });

}
