import './bootstrap';
import {Datepicker} from 'vanillajs-datepicker';
import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css';
Dropzone.autoDiscover = false;
window.Dropzone = Dropzone;
window.Datepicker = Datepicker;
