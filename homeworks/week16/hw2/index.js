const queue = [];
let i = 0;
let j = 0;

function push(task) {
  // console.log(`i: ${i}`);
  queue[i] = task;
  // console.log(`queue: ${queue}`);
  i += 1;
  // console.log(`i+1: ${i}`);
  // queue += task;
}

push(1);
console.log(`push 1: ${queue}`);
push(2);
console.log(`push 2: ${queue}`);
push(3);
console.log(`push 3: ${queue}`);

function pop() {
  // console.log(queue);
  // console.log(`j: ${j}`);
  const first = queue[j];
  // console.log(`first: ${first}`);
  j += 1;
  // console.log(`j: ${j}`);
  return first;
}

console.log(pop());
console.log(pop());
push(4);
console.log(`push 4: ${queue}`);
console.log(pop());

const stack = [];
let pointer = 0;

function spush(task) {
  stack[pointer] = task;
  pointer += 1;
}

spush(10);
console.log(`stack 10: ${stack}`);
spush(11);
console.log(`stack 11: ${stack}`);
spush(12);
console.log(`stack 12: ${stack}`);

function spop() {
  console.log(stack);
  pointer -= 1;
  const last = stack[pointer];
  return last;
}

console.log(spop());
console.log(spop());
spush(13);
console.log(`stack 13: ${stack}`);
console.log(spop());
spush(14);
console.log(`stack 14: ${stack}`);
spush(15);
console.log(`stack 15: ${stack}`);

// class Stack {
//   // let stackName = [];
//   // let pointer = 0;

//   // constructor stack = [];
//   // constructor pointer = 0;

// }

// var stack = new Stack();
// console.log(stack);
