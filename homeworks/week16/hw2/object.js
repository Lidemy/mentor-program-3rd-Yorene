function Queue() {
  this.data = [];
  this.tail = 0;
  this.head = 0;

  this.qpush = function qpush(task) {
    this.data[this.tail] = task;
    this.tail += 1;
  };

  this.qpop = function qpop() {
    const first = this.data[this.head];
    this.head += 1;
    return first;
  };
}

const queue = new Queue();
queue.qpush(1);
console.log(`push 1: ${queue.data}`);
queue.qpush(2);
console.log(`push 2: ${queue.data}`);
console.log(queue.qpop()); // 1
console.log(queue.qpop()); // 2

function Stack() {
  this.data = [];
  this.pointer = 0;

  this.spush = function spush(task) {
    this.data[this.pointer] = task;
    this.pointer += 1;
  };

  this.spop = function spop() {
    this.pointer -= 1;
    return this.data[this.pointer];
  };
}

const stack = new Stack();
stack.spush(10);
console.log(`push 10: ${stack.data}`);
stack.spush(5);
console.log(`push 5: ${stack.data}`);
console.log(stack.spop()); // 5
console.log(stack.spop()); // 10
