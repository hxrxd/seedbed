import { a as jsx } from "../ssr.js";
function InputLabel({ value, className = "", children, ...props }) {
  return /* @__PURE__ */ jsx("label", { ...props, className: `block font-medium text-sm text-gray-700 dark:text-gray-300 ` + className, children: value ? value : children });
}
export {
  InputLabel as I
};
