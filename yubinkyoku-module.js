const search = document.getElementsByClassName('search')[0];

const growSearchLabel = () => {search.style.fontSize = '18px'; search.style.opacity = '0.4';}
const shrinkSearchLabel = () => {search.style.fontSize = '16px'; search.style.opacity = '1';}


const searchFormModule = {

  growSearchLabel : () => search.addEventListener('mouseover', growSearchLabel, false),
  shrinkSearchLabel : () => search.addEventListener('mouseout', shrinkSearchLabel, false)

};


searchFormModule[Symbol.for('searchForm::initialise')] = {

  growSearchLabel : searchFormModule.growSearchLabel,
  shrinkSearchLabel : searchFormModule.shrinkSearchLabel

};


export {searchFormModule};
