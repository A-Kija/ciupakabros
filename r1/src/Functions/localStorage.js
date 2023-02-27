import { v4 as uuidv4 } from 'uuid';

const write = (key, data) => {
    localStorage.setItem(key, JSON.stringify(data));
}

export const read = (key) => {
    let data = localStorage.getItem(key);
    if (null === data) {
        data = [];
    } else {
        data = JSON.parse(data);
    }
    return data;
}

export const create = (key, data) => {
    const allData = read(key);
    data.id = uuidv4();
    allData.push(data);
    write(key, allData);
}

export const destroy = (key, id) => {
    const allData = read(key);
    const deletedData = allData.filter(d => id !== d.id);
    write(key, deletedData);
}

export const edit = (key, data, id) => {
    const allData = read(key);
    const editedData = allData.map(d => id === d.id ? {...d, ...data, id: id } : {...d });
    write(key, editedData);
}