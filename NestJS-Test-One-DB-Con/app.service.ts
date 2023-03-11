import { Injectable, Inject } from '@nestjs/common';
import * as mssql from 'mssql';

@Injectable()
export class AppService {
  constructor(@Inject('Connection') private connection: mssql.ConnectionPool) {}

  async onModuleInit() {
    // await this.userService.connectToDatabase();
    console.log('ISO-2: ' + this.getDateISO());
    console.log(this.getCurrentDateTime(this.getDateISO()));
  }

  getDateISO() {
    const date = new Date();
    const timezoneOffset = date.getTimezoneOffset();
    const isoDate = new Date(Date.now() - timezoneOffset * 60000).toISOString();
    return isoDate;
  }

  getCurrentDateTime(dateString): string {
    const date = new Date(dateString);
    return date.toISOString().slice(0, 19).replace('T', ' ');
  }

  async findAll(id: number): Promise<any> {
    const result = await this.connection
      .request()
      .input('id', mssql.Int, id)
      .query('SELECT * FROM users Where id = @id');
    return result.recordset[0];
  }
}
