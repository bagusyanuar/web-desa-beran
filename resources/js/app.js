import "./bootstrap";
import "flowbite";
import { Datepicker } from "vanillajs-datepicker";
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";
import "./util/slick.js";

Dropzone.autoDiscover = false;
window.Dropzone = Dropzone;
window.Datepicker = Datepicker;
