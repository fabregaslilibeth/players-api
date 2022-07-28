class Errors {
  constructor () {
    this.errors = {}
  }
  has (field) {
    return Object.prototype.hasOwnProperty.call(this.errors, field)
  }
  get (field) {
    if (this.errors[field]) {
      return this.errors[field][0]
    }
  }
  record (errors) {
    this.errors = errors
  }
  clear(field) {
    if (field) {
      delete this.errors[field];
      return;
    }

    this.errors = {};
  }
}

export default Errors
