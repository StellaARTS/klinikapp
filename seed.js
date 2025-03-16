import { Sequelize, DataTypes } from 'sequelize';
import { faker } from '@faker-js/faker';

// Buat koneksi database
const sequelize = new Sequelize('psts', 'root', '', {
    host: 'localhost',
    dialect: 'mysql',
});

// Definisi Model
const Student = sequelize.define('Student', {
    nama: { type: DataTypes.STRING, allowNull: false },
    jenisKelamin: { type: DataTypes.STRING },
    email: { type: DataTypes.STRING, unique: true },
    noTelp: { type: DataTypes.STRING },
    kelas: { type: DataTypes.STRING }
}, { timestamps: false });

async function seedStudents() {
    try {
        await sequelize.authenticate();
        console.log('Connected to MySQL');

        await sequelize.sync();

        let students = [];
        for (let i = 0; i < 100; i++) {
            students.push({
                nama: faker.person.fullName(),
                jenisKelamin: faker.person.sex(),
                email: faker.internet.email(),
                noTelp: faker.phone.number(),
                kelas: `Kelas ${faker.number.int({ min: 1, max: 12 })}`,
            });
        }

        await Student.bulkCreate(students);
        console.log('100 Data siswa berhasil ditambahkan!');
    } catch (error) {
        console.error('Error:', error);
    } finally {
        await sequelize.close();
    }
}

seedStudents();
