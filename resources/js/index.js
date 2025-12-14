import Dropdown from './Dropdown.vue';
import DropdownItem from './DropdownItem.vue';

export { Dropdown, DropdownItem };

export default {
  install(app) {
    app.component('LdDropdown', Dropdown);
    app.component('LdDropdownItem', DropdownItem);
  }
};
