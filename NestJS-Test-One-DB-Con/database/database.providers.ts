import { Injectable, Provider } from '@nestjs/common';
import * as mssql from 'mssql';
import { ConfigService } from '@nestjs/config';

export const ConnectionProvider: Provider = {
  provide: 'Connection',
  useFactory: async (configService: ConfigService) => {
    const config = {
      user: configService.get<string>('DB_USERNAME'),
      password: configService.get<string>('DB_PASSWORD'),
      server: configService.get<string>('DB_HOST'),
      port: configService.get<number>('DB_PORT'),
      database: configService.get<string>('DB_DATABASE'),
      options: {
        encrypt: true,
      },
    };
    const pool = new mssql.ConnectionPool(config);
    await pool.connect();
    return pool;
  },
  inject: [ConfigService],
};

//npm install --save-dev @types/mssql

// tsconfig.json
// {
//   "compilerOptions": {
//     "skipLibCheck": true
//   }
// }
