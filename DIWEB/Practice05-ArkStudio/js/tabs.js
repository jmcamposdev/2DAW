// Start when the page is loaded
window.addEventListener('load', function() {
  addTabsEventsListeners("service__tabs");
  addTabsEventsListeners("projects__tabs");
});


function addTabsEventsListeners(containerId) {
  const tabs = document.querySelectorAll(`#${containerId} .tab__item`);
  
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // Change the Tabs Layout
      removeActiveClass(containerId);
      addActiveClass(tab);
      // Change the Tabs Content
      removeActiveContent(containerId);
      addActiveContent(tab, containerId);
    });
  });
}

function removeActiveClass(containerId) {
  const tabs = document.querySelectorAll(`#${containerId} .tab__item`);
  
  tabs.forEach(tab => {
    tab.classList.remove('tab__selected');
  });
}

function addActiveClass(tab) {
  tab.classList.add('tab__selected');
}

function removeActiveContent(containerId) {
  const tabsContent = document.querySelectorAll(`#${containerId} .tab__panel`);
  
  tabsContent.forEach(content => {
    content.classList.remove('tab__content--selected');
  });
}

function addActiveContent(tab, containerId) {
  const tabId = tab.dataset.id;
  const tabContent = document.querySelector(`#${containerId} .tab__panel[data-id="${tabId}"]`);
  
  tabContent.classList.add('tab__content--selected');
}